# advent-of-code-2023
My solution and wrapper for the Advent of Code 2023

## Installation

To install the project run the following command:

```bash
make up
```

Then run a server or use the built in PHP server:

```bash
make serve # This will start a PHP server on port 8000
```

In `index.php` you can provide the right Day::class to run the solution for that day.

## Create a new day

To create a new day use the following command:

```bash
make new_day day=1 # Replace 1 with the day you want to create
```

This will create a new folder in the `src` folder with the following structure:

```bash
data
└── day1
	├── input_part1.txt
	├── input_part2.txt
	├── sample.txt
src
└── Solutions
	└── Day1
		├── Day1.php
```

The `Day1.php` is the file where you want to put your solution. The `input_part1.txt` and `input_part2.txt` are the input files for the puzzle.  
The `sample.txt` is the sample input file for the puzzle.  
You have you manually copy the input from the website to the input files.  