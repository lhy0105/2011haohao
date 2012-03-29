#include <stdio.h>


/*	N个数，确定其中第k个最大者	*/
#define N 7

void swap(int *des, int *src){
	*src = *des + *src;
	*des = *src - *des;
	*src = *src - *des;
}	

/*	冒泡排序:递减顺序排序	*/
void bubble(int *p, int k){
	int j = 0;
	int i = 0;
	for(i = 0; i < N; i++){
		for(j = i + 1; j < N; j++){
			if(*(p+i) < *(p+j))
				swap(p+i , p+j);
		}
	}

	/*	Print Content	*/
	for(i = 0; i < N; i++){
		printf("%d\n", *(p + i));
	}

	printf("第%d个元素是:%d\n", k, *(p + 4 -1));

}


int main(int argc, char **argv){
	int n[N] = {8,2,5,9,1,4,6};
	int k = 4;
	bubble(n, k);
	return 0;
}
