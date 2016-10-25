/*
Stairs:

        _
      _|3
    _|2
  _|1
  0


 Take one step to the next stair
 Or 2 steps to the next to next stair.
 0 -> 1
 0 -> 2

 Input -> 3
 Output -> 3
 Ways -> (1, 2, 3) ; (1, 3); (2, 3)


 Input -> 4
 Output -> 5
 Ways ->(1, 2, 3, 4) ; (1, 2, 4); (1, 3, 4);
 */

 /* CREATE BST of values, each node is either 1 r 2 greater than its parent.
 Once we hit the input value, we stop that path, and move on
 Once we create tree, we count number of ways to get to the bottom (Key value)


 DO DFS and count number of times we reach the bottom*/

 typedef struct _node {

     int value;
     struct _node* left;
     struct _node* right;
} Node;

Node* createBinaryTree(int input){

    Node* root;

    insertNodes(root, input, 0);//Create rest of Binary Tree

    int countTargetValue = 0;

    DFS(root, input, &countTargetValue);

    return countTargetValue;
}

void insertNodes(Node* root, int input, int startValue) {
    if(startValue > input) {
        return;
    }

    root = malloc(sizeof(Node));
    root->value = startValue;

    root->left = NULL;
    root->right = NULL;

    insertNodes(root->left, input, startValue+=1);
    insertNodes(root->right, input, startValue+=2);
}

void DFS(Node* root, int input, int* countTargetValue) {

    if (root->value == input){
        *(countTargetValue)++;
        return;
    }

    DFS(root->left, input, countTargetValue);
    DFS(root->right, input, countTargetValue);
}



// Time Complexity -> 2^n
// Memory Complexity -> 2^n
