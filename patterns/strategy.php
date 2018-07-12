<?php
// Класс Numbers хранит массив чисел, который может сортировать и по которому может делать поиск.
// Сортировка и поиск делегируется объектам других классов, которые реализуют интерфейсы Sorting и Searching.
// Эти классы могут реализовывать алгоритмы сортировки и поиска по разному.
// Таким образом реализация алгоритмов инкапсулирована в отдельные классы и независима от класса, который
// их использует. Могут быть добавлены новые алгоритмы, не ломая текущий код.

interface Sorting
{
    public function sort(array $nums): array;
}

interface Searching
{
    public function search(array $nums, int $val): int;
}

// Реализуем два алгоритма сортировки и два алгоритма поиска.
// Объекты Numbers могут использовать любую комбинацию из них.

class QuickSort implements Sorting
{
    public function sort(array $nums): array
    {
        if (count($nums) < 2) {
            return $nums;
        }

        $loe = $gt = [];
        $pivot = array_shift($nums);

        foreach ($nums as $num) {
            if ($num <= $pivot) {
                $loe[] = $num;
            } elseif ($num > $pivot) {
                $gt[] = $num;
            }
        }

        return array_merge($this->sort($loe), [$pivot], $this->sort($gt));
    }
}

class InsertionSort implements Sorting
{
    public function sort(array $nums): array
    {
        for ($i = 0; $i < count($nums); $i++) {
            $val = $nums[$i];
            $j = $i - 1;

            while ($j >= 0 && $nums[$j] > $val) {
                $nums[$j + 1] = $nums[$j];
                $j--;
            }

            $nums[$j + 1] = $val;
        }

        return $nums;
    }
}

class BinarySearch implements Searching
{
    public function search(array $nums, int $val): int
    {
        if (count($nums) === 0) {
            return -1;
        }

        $low = 0;
        $high = count($nums) - 1;

        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);

            if ($nums[$mid] == $val) {
                return $mid;
            }

            if ($val < $nums[$mid]) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }
}

class LinearSearch implements Searching
{
    public function search(array $nums, int $val): int
    {
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] === $val) {
                return $i;
            }
        }

        return -1;
    }
}

// Классы, наследующие от класса Numbers обязаны реализовать метод display,
// который выводит на экран содержимое массива. Есть сеттеры, которые позволяют
// менять алгоритмы сортировки и поиска во время выполнения.

abstract class Numbers
{
    protected $nums;
    protected $sortingAlgorithm;
    protected $searchingAlgorithm;

    public function __construct(array $nums)
    {
        $this->nums = $nums;
    }

    abstract public function display(): void;

    public function addNumber(int $num): void
    {
        $this->nums[] = $num;
    }

    public function sort(): void
    {
        $this->nums = $this->sortingAlgorithm->sort($this->nums);
    }

    public function search(int $val): int
    {
        return $this->searchingAlgorithm->search($this->nums, $val);
    }

    public function setSorting(Sorting $algorithm): void
    {
        $this->sortingAlgorithm = $algorithm;
    }

    public function setSearching(Searching $algorithm): void
    {
        $this->searchingAlgorithm = $algorithm;
    }
}

class SimpleNumbers extends Numbers
{
    public function __construct(array $nums)
    {
        parent::__construct($nums);

        // Здесь для простоты программы мы нарушаем правило "кодируй на уровне интерфейса, а не на уровне реализации".
        $this->setSorting(new InsertionSort);
        $this->setSearching(new LinearSearch);
    }

    public function display(): void
    {
        foreach ($this->nums as $num) {
            echo $num . ", ";
        }
        echo "\n";
    }
}

class AdvancedNumbers extends Numbers
{
    public function __construct(array $nums)
    {
        parent::__construct($nums);

        // Здесь для простоты программы мы нарушаем правило "кодируй на уровне интерфейса, а не на уровне реализации".
        $this->setSorting(new QuickSort);
        $this->setSearching(new LinearSearch);
    }

    public function display(): void
    {
        foreach ($this->nums as $num) {
            echo "[{$num}] ";
        }
        echo "\n";
    }
}

// Создадим объект одного из классов. Выполним поиск. Потом отсортируем массив.
// Поскольку массив уже отсортирован, можно во время выполнения изменить алгоритм поиска на более эффективный.

$x = new AdvancedNumbers([4, 1, 5, 0, 3 ,2]);
var_dump($x->search(1)); // 1
var_dump($x->search(5)); // 2

$x->sort();
$x->setSearching(new BinarySearch());
var_dump($x->search(1)); // 1
var_dump($x->search(5)); // 5
