import sys
s = input("Enter test string: ")  # read the sample test string
count_leading_a = 0  # count the leading a's in the string
i = 0
while i < len(s) and s[i] == 'a':
    # loop for all the leading a's and increase count
    count_leading_a += 1
    i += 1

 # since n > 0, n+1 > 1, the count_leading_a must be >= 2, otherwise the turing machine rejects such strings
if count_leading_a < 2:

    print(s, "this string is not accepted by Turing machine")
    # rejects the string and exits
    sys.exit()
    

 # code reaches here if count_leading_a >= 2, next step is to count the b's
count_b = 0
while i < len(s) and s[i] == 'b':
    count_b += 1
    i += 1

 # count of b's must be equal to count of leading a's, otherwise the turing machine rejects such strings
if count_b != count_leading_a:
    # rejects the string and exits
    print(s, "this string is not accepted by Turing machine")
    sys.exit()

# code reaches here if count_leading_a equals count_b, next step is to count the the a's at the end of string
count_a = 0
while i < len(s) and s[i] == 'a':
    count_a += 1
    i += 1

 # count of a's at end must be equal to count of leading a's, otherwise the turing machine rejects such strings
if count_a != count_leading_a:
    # rejects the string and exits
    print(s, "this string is not accepted by Turing machine")
    sys.exit()

 # code reaches here if string is in language a^n+1 b^n+1 a^n+1, Turing machine accepts such string
print(s, "this string is accepted by the turing machine (it belongs to given language)")
