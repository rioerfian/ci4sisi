def triangleStar(num):
    space = num-1
    for i in range(num):
        for j in range(0,space):
            print(" ", end="")
        space -= 1
        for j in range(i+1):
            print("* ",end="")
        print("")

def triangleNum(num):
    for i in range(1,num+1):
        print(" "*(num-i),end="")
        for j in range(1,i+1):
            print(str(j),end="")
        print("")


num = int(input("Enter an integer as input: "))
triangleStar(num)
triangleNum(num)

