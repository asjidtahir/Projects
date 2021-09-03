[org 0x0100]
jmp start
start:		
			call clearscreen
			 mov ax, 0
			 mov es, ax 
			 			
			 mov ax, [es:9*4]    
			 mov [oldkb],ax
			 mov ax, [es:9*4+2]
			 mov [oldkb+2], ax			
			
			 mov word [es:9*4], kbisr
			 mov [es:9*4+2], cs
		
			 mov word [es:8*4], digitalclock
			 mov [es:8*4+2], cs
			 sti	
			
			 mov dx, start
			 add dx, 15
			 mov cl, 4
			 shr dx, cl		 
			 mov ax,0x4c00
			int 0x21
;=========================================================
oldkb:	dd 0 	;For the purpose of saving the old keyboard ISR(each time I press a key)
;Flags for Modes
sMode:	db 0
lMode:	db 0
startTimer:  db 0
snapshot:    db 0
lapTime:     db 0
location:	db 6
hrs:	dw 12
min:	dw 00
s:		dw 00  
lhrs:	dw 0
lmin:	dw 0
ls:		dw 0
;========================================================
clearscreen:		pusha
			        push es
			mov ax, 0xb800
			mov es, ax
			xor di, di
			mov ax, 0x720
			mov cx, 2000	
			cld
			rep stosw
			pop es
			popa
			ret
kbisr:		    push ax
			    in  al, 0x60
			    cmp al, 147	
				jnz modChanger	   
modChanger:		cmp al, 170						;Release code of Shift Left
				jnz checkLMode1
				mov byte [cs:lMode], 0			;Disable the lap mode
				cmp byte [cs:sMode], 1			;If sMode was already enabled then do nothing
				jz EOI1
				mov byte [cs:sMode], 1			;Else enable the sMode
				jmp EOI1
				lms: 	dw 0
				ms:		dw 0
checkLMode1:	cmp al, 182						;Release code of Shift Right
				jnz startTime
				mov byte [cs:sMode], 0			;Disable the split Mode
				cmp byte [cs:lMode], 1			;If lMode was aleady enabled then do nothing
				jz  EOI1			
				mov byte [cs:lMode], 1			;Else enable the lMode
				jmp EOI1
startTime:		cmp al, 185
				jnz oldKbHandler
				cmp byte [cs:startTimer], 1		;If Timer is already started then do nothing
				jz  check0
				mov byte [cs:startTimer], 1 	;Else start the timer 
check0:			cmp byte [cs:sMode], 1 			;If split mode is enabled
				jnz  check1
				mov byte [cs:snapshot], 1
				jmp EOI1
check1:			cmp byte [cs:lMode], 1   		;Else if the lap mode is enabled
				jnz EOI1
				mov byte [cs:lapTime], 1
				jmp EOI1				
EOI1:			mov al, 0x20 					;End of Interrupt Signal
				out 0x20,al
				pop ax
				iret
oldKbHandler:	pop ax
				jmp far [cs:oldkb]

printstr:	push bp
			mov bp, sp
			pusha
			push es	
			mov ax, 0xb800
			mov es, ax
			mov di, [bp+4]					;Location
			mov ax, [bp+6]					;Number		
			mov bx, 10
			mov cx, 0
nextdigit:	mov dx, 0
			div bx
			add dl, 0x30
			push dx
			inc cx
			cmp ax, 0
			jnz nextdigit
			cmp cx, 1
			jnz nextpos
			mov byte [es:di], '0'
			add di, 2
nextpos:	pop dx
			mov dh, 0x07
			mov [es:di], dx
			add di, 2
			loop nextpos
			pop es
			popa
			pop bp
			ret 4
printTime:	push bp
			mov bp,sp
			pusha
			push es
			mov ax, 0xB800
			mov es, ax
			mov di, [bp+0]					
			push word [bp+6]
			add di, 2
			push di
			call printstr
			add di, 10
			mov byte [es:di], ':'
			push word [bp+8]
			add di, 10
			push di
			call printstr
			add di, 10
			mov byte [es:di], ':'
			push word [bp+10]
			add di, 10
			push di
			call printstr
			pop es
			popa
			pop bp
			ret 10			
 digitalclock:	pusha
			    push es
			;call printLayout
			push word [cs:ms]
			push word [cs:s]
			push word [cs:min]
			push word [cs:hrs]	
			push 480
			call printTime
			cmp byte [cs:startTimer], 1
			jnz dEOI							;Using two jumps because of the short range of near jump

changeTime:	add word [cs:ms], 55
			cmp word[cs:ms], 1000
			jle modCheck
			mov word [cs:ms], 0
			inc word[cs:s]
			cmp word [cs:s], 60
			jnz modCheck
			mov word [cs:s], 0
			inc word[cs:min]
			cmp word [cs:min], 60
			jnz modCheck
			mov word [cs:min], 0
			inc word[cs:hrs]
			jmp modCheck
 modCheck:	cmp byte [cs:sMode], 1
			jz splitMode
			cmp byte [cs:lMode], 1
			jz  lapMode
			jmp EOI
 dEOI:		jmp EOI 	
 splitMode:	cmp byte [cs:snapshot], 1
 			jnz eEOI						
 			mov byte [cs:snapshot], 0
 			push word [cs:ms]
		    push word [cs:s]
	 	    push word [cs:min]
		    push word [cs:hrs]	
 			mov al, 80
 			mul byte [cs:location]
 			shl ax, 1
 			add byte [cs:location], 2
 			push ax
 			call printTime
 			jmp EOI
 eEOI:	   jmp EOI 		
 lapMode:  cmp byte [cs:lapTime], 1
 		   jnz xEOI              
 		   mov byte [cs:lapTime], 0
 		   mov ax, [cs:ms]
 		   mov bx, [cs:s]
 		   mov cx, [cs:min]
 		   mov dx, [cs:hrs]
l1:		   sub ax, [cs:lms]
 		   cmp ax, 0
 		   jge l2
 		   add ax, 1000 
 		   dec bx
l2:	   	   mov [cs:lms],ax
		   sub bx, [cs:ls]
 		   cmp bx, 0
 		   jge l3
 		   add bx, 60
 		   dec cx
l3:		   mov [cs:ls],bx
 		   jmp l4		
xEOI:	   jmp EOI               
l4:		   sub cx, [cs:lmin]
 		   cmp cx, 0
 		   jge l5
 		   add cx, 60
 		   dec dx
l5:		   mov [cs:lmin],cx
 		   sub dx, [cs:lhrs]
		   mov [cs:lhrs],dx
 		   push word [cs:lms]
		   push word [cs:ls]
	 	   push word [cs:lmin]
		   push word [cs:lhrs]
		   mov al, 80
		   mul byte [cs:location]
 		   shl ax, 1
 		   add byte [cs:location], 2
 		   push ax
		   call printTime
		   jmp EOI	
EOI:		mov al, 0x20
			out 0x20, al
			
return:		pop es
			popa
			iret
