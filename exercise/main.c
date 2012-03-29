#include <stdio.h>
#include <unistd.h>

int main(int argc, char **argv){
	int a[11] = {0, 1, 2, 3, 4, 5};
	int *p = a;
	int *q = &a[4];


	printf("p地址:%d\nq地址:%d\n",p,q);
	printf("q-p+1:%d\n", q - p + 1);
	return 0;
}
