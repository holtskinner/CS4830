/*
Pascal's Triangle


          1
          1 1
         1 2 1
        1 3 3 1
       1 4 6 4 1


Rules:
Everything on edge always a 1
Everything else is the sum of the two elements above it

   0 1 2 3
0: 1
1: 1 1
2: 1 2 1
3: 1 3 3 1

Function that takes in row and column and gives number at space
Work for ALL inputs
Weird Inputs, skip, do just integers

*/

int pascalTriangle(int row, int column) {

    int triangle[1000][1000];
    createTriangle(triangle, 1000); //Helper function that creates the triangle, maybe put result in file instead???

    if(column <= row) {
        return triangle[row][column];
    }
    else {
        return -1; //NULL
    }
}


void createTriangle(int triangle[][], int size) {

    int i = 0, j = 0;

    for(i=0; i < size; i++) {
        for(j=0; j <= i;j++){
            if(j == 0 || i == j) {
              triangle[i][j] = 1;
            }
            triangle[i][j] = triangle[i-1][j-1] + triangle [i-1][j];
        }
    }
return;
}
