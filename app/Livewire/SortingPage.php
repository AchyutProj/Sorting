<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class SortingPage extends Component
{
    #[Rule(['required'])]
    public $inputValue;

    public $sortingSteps = [];

    public $currentAlgorithm;

    public function mount()
    {
        $this->inputValue = 'achyutneupane';
    }

    public function render()
    {
        return view('livewire.sorting-page');
    }

    /**
     *
     * This function will sort the input value using bubble sort algorithm.
     *
     * Algorithm: Bubble Sort
     * Steps:
     * Bubble Sort is the simplest sorting algorithm that works by repeatedly swapping the adjacent elements if they are in wrong order.
     * The algorithm compares the first two elements, and if the first is greater than the second, it swaps them.
     * It continues doing this for each pair of adjacent elements to the end of the data set.
     *
     * Time Complexity: O(n^2)
     * Space Complexity: O(1)
     *
     * @return void
     */
    public function bubbleSort()
    {
        $this->validate();
        $this->currentAlgorithm = 'Bubble Sort';
        $this->sortingSteps = [$this->inputValue];
        $array = str_split($this->inputValue);
        $length = count($array);
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j + 1];
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $temp;

                    $stepArray = $array;
                    $stepArray[$j] = '<span class="text-red-500">' . $stepArray[$j] . '</span>';
                    $stepArray[$j + 1] = '<span class="text-red-500">' . $stepArray[$j + 1] . '</span>';
                    $this->sortingSteps[] = implode('', $stepArray);
                }
            }
        }
        $this->inputValue = implode('', $array);
    }

    /**
     *
     * This function will sort the input value using selection sort algorithm.
     *
     * Algorithm: Selection Sort
     * Steps:
     * The selection sort algorithm sorts an array by repeatedly finding the minimum element (considering ascending order) from unsorted part and putting it at the beginning.
     * The algorithm maintains two subarrays in a given array.
     * 1) The subarray which is already sorted.
     * 2) Remaining subarray which is unsorted.
     * In every iteration of selection sort, the minimum element (considering ascending order) from the unsorted subarray is picked and moved to the sorted subarray.
     *
     * Time Complexity: O(n^2)
     * Space Complexity: O(1)
     *
     * @return void
     */
    public function selectionSort()
    {
        $this->validate();
        $this->currentAlgorithm = 'Selection Sort';
        $this->sortingSteps = [$this->inputValue];
        $array = str_split($this->inputValue);
        $length = count($array);
        for ($i = 0; $i < $length - 1; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($array[$j] < $array[$minIndex]) {
                    $minIndex = $j;
                }
            }
            $temp = $array[$minIndex];
            $array[$minIndex] = $array[$i];
            $array[$i] = $temp;

            $stepArray = $array;
            $stepArray[$i] = '<span class="text-red-500">' . $stepArray[$i] . '</span>';
            $stepArray[$minIndex] = '<span class="text-red-500">' . $stepArray[$minIndex] . '</span>';
            $this->sortingSteps[] = implode('', $stepArray);
        }
        $this->inputValue = implode('', $array);
    }

    /**
     *
     * This function will sort the input value using insertion sort algorithm.
     *
     * Algorithm: Insertion Sort
     * Steps:
     * Insertion sort is a simple sorting algorithm that works similar to the way you sort playing cards in your hands.
     * The array is virtually split into a sorted and an unsorted part.
     * Values from the unsorted part are picked and placed at the correct position in the sorted part.
     * Algorithm:
     * To sort an array of size n in ascending order:
     * 1: Iterate from arr[1] to arr[n] over the array.
     * 2: Compare the current element (key) to its predecessor.
     * 3: If the key element is smaller than its predecessor, compare it to the elements before.
     * Move the greater elements one position up to make space for the swapped element.
     *
     * Time Complexity: O(n^2)
     * Space Complexity: O(1)
     *
     * @return void
     */
    public function insertionSort()
    {
        $this->validate();
        $this->currentAlgorithm = 'Insertion Sort';
        $this->sortingSteps = [$this->inputValue];
        $array = str_split($this->inputValue);
        $length = count($array);
        for ($i = 1; $i < $length; $i++) {
            $key = $array[$i];
            $j = $i - 1;
            while ($j >= 0 && $array[$j] > $key) {
                $array[$j + 1] = $array[$j];
                $j--;
            }
            $array[$j + 1] = $key;

            $stepArray = $array;
            $stepArray[$j + 1] = '<span class="text-red-500">' . $stepArray[$j + 1] . '</span>';
            $stepArray[$i] = '<span class="text-red-500">' . $stepArray[$i] . '</span>';
            $this->sortingSteps[] = implode('', $stepArray);
        }
        $this->inputValue = implode('', $array);
    }

    /**
     *
     * This function will sort the input value using quick sort algorithm.
     *
     * Algorithm: Quick Sort
     * Steps:
     * QuickSort is a Divide and Conquer algorithm.
     * It picks an element as pivot and partitions the given array around the picked pivot.
     * There are many different versions of quickSort that pick pivot in different ways.
     * 1. Always pick first element as pivot.
     * 2. Always pick last element as pivot (implemented below)
     * 3. Pick a random element as pivot.
     * 4. Pick median as pivot.
     * The key process in quickSort is partition().
     * Target of partitions is, given an array and an element x of array as pivot, put x at its correct position in sorted array and put all smaller elements (smaller than x)
     * before x, and put all greater elements (greater than x) after x.
     * All this should be done in linear time.
     *
     * Time Complexity: O(n log n)
     * Space Complexity: O(1)
     *
     * @return void
     */
    public function quickSort()
    {
        $this->validate();
        $this->currentAlgorithm = 'Quick Sort';
        $this->sortingSteps = [$this->inputValue];
        $array = str_split($this->inputValue);
        $length = count($array);
        $this->quickSortHelper($array, 0, $length - 1);
        $this->inputValue = implode('', $array);
    }

    /**
     *
     * This function is the helper function for quick sort.
     *
     * In this function, the input array is divided into two halves and then quickSortHelper() function is called for each half.
     *
     * @see quickSort()
     * @see partition()
     *
     * @param array $array
     * @param int $left
     * @param int $right
     * @return void
     */
    public function quickSortHelper(&$array, $left, $right)
    {
        if ($left < $right) {
            $partitionIndex = $this->partition($array, $left, $right);
            $this->quickSortHelper($array, $left, $partitionIndex - 1);
            $this->quickSortHelper($array, $partitionIndex + 1, $right);
        }
    }

    /**
     *
     * This function is the helper function for quick sort.
     *
     * In this function, the last element of the array is selected as pivot and then all the elements smaller than the pivot are moved to the left of the pivot and all the elements greater than the pivot are moved to the right of the pivot.
     *
     * @see quickSortHelper()
     * @see quickSort()
     *
     * @param array $array
     * @param int $left
     * @param int $right
     * @return int
     */
    public function partition(&$array, $left, $right)
    {
        $pivot = $array[$right];
        $i = $left - 1;
        for ($j = $left; $j < $right; $j++) {
            if ($array[$j] < $pivot) {
                $i++;
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;

                $stepArray = $array;
                $stepArray[$i] = '<span class="text-red-500">' . $stepArray[$i] . '</span>';
                $stepArray[$j] = '<span class="text-red-500">' . $stepArray[$j] . '</span>';
                $this->sortingSteps[] = implode('', $stepArray);
            }
        }
        $temp = $array[$i + 1];
        $array[$i + 1] = $array[$right];
        $array[$right] = $temp;

        $stepArray = $array;
        $stepArray[$i + 1] = '<span class="text-red-500">' . $stepArray[$i + 1] . '</span>';
        $stepArray[$right] = '<span class="text-red-500">' . $stepArray[$right] . '</span>';
        $this->sortingSteps[] = implode('', $stepArray);

        return $i + 1;
    }

    /**
     *
     * This function will sort the input value using merge sort algorithm.
     *
     * Algorithm: Merge Sort
     * Steps:
     * Merge Sort is a Divide and Conquer algorithm.
     * It divides the input array into two halves, calls itself for the two halves, and then merges the two sorted halves.
     * The merge() function is used for merging two halves.
     * The merge(arr, l, m, r) is a key process that assumes that arr[l..m] and arr[m+1..r] are sorted and merges the two sorted sub-arrays into one.
     *
     * Time Complexity: O(n log n)
     * Space Complexity: O(n)
     *
     * @return void
     *
     * @see merge()
     * @see mergeSortHelper()
     */
    public function mergeSort()
    {
        $this->validate();
        $this->currentAlgorithm = 'Merge Sort';
        $this->sortingSteps = [$this->inputValue];
        $array = str_split($this->inputValue);
        $length = count($array);
        $this->mergeSortHelper($array, 0, $length - 1);
        $this->inputValue = implode('', $array);
    }

    /**
     *
     * This function is the helper function for merge sort.
     *
     * In this function, the input array is divided into two halves and then mergeSortHelper() function is called for each half.
     *
     * @see mergeSort()
     * @see merge()
     *
     * @param array $array
     * @param int $left
     * @param int $right
     * @return void
     */
    public function mergeSortHelper(&$array, $left, $right)
    {
        if ($left < $right) {
            $mid = floor(($left + $right) / 2);
            $this->mergeSortHelper($array, $left, $mid);
            $this->mergeSortHelper($array, $mid + 1, $right);
            $this->merge($array, $left, $mid, $right);
        }
    }

    /**
     *
     * This function is the helper function for merge sort.
     *
     * In this function, the two halves of the array are merged together.
     *
     * @see mergeSortHelper()
     * @see mergeSort()
     *
     * @param array $array
     * @param int $left
     * @param int $mid
     * @param int $right
     * @return void
     */
    public function merge(&$array, $left, $mid, $right)
    {
        $leftArray = [];
        $rightArray = [];
        $leftArrayLength = $mid - $left + 1;
        $rightArrayLength = $right - $mid;
        for ($i = 0; $i < $leftArrayLength; $i++) {
            $leftArray[$i] = $array[$left + $i];
        }
        for ($i = 0; $i < $rightArrayLength; $i++) {
            $rightArray[$i] = $array[$mid + 1 + $i];
        }
        $i = 0;
        $j = 0;
        $k = $left;
        while ($i < $leftArrayLength && $j < $rightArrayLength) {
            if ($leftArray[$i] <= $rightArray[$j]) {
                $array[$k] = $leftArray[$i];
                $i++;
            } else {
                $array[$k] = $rightArray[$j];
                $j++;
            }
            $k++;

            $stepArray = $array;
            $stepArray[$k - 1] = '<span class="text-red-500">' . $stepArray[$k - 1] . '</span>';
            $this->sortingSteps[] = implode('', $stepArray);
        }
        while ($i < $leftArrayLength) {
            $array[$k] = $leftArray[$i];
            $i++;
            $k++;

            $stepArray = $array;
            $stepArray[$k - 1] = '<span class="text-red-500">' . $stepArray[$k - 1] . '</span>';
            $this->sortingSteps[] = implode('', $stepArray);
        }
        while ($j < $rightArrayLength) {
            $array[$k] = $rightArray[$j];
            $j++;
            $k++;

            $stepArray = $array;
            $stepArray[$k - 1] = '<span class="text-red-500">' . $stepArray[$k - 1] . '</span>';
            $this->sortingSteps[] = implode('', $stepArray);
        }
    }
}
