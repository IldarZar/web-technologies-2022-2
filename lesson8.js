// Задание 1
{
    const students = [
        { name: "Павел", age: 20 },
        { name: "Иван", age: 20 },
        { name: "Эдем", age: 20 },
        { name: "Денис", age: 20 },
        { name: "Виктория", age: 20 },
        { age: 40 }
    ];

    const result = pickPropArray(students, "name");

    console.log(result); // [ 'Павел', 'Иван', 'Эдем', 'Денис', 'Виктория' ]

    function pickPropArray(students, property) {
        const result = [];
        students.forEach(
            (student) => student[property] && result.push(student[property])
        );

        return result;
    }
}



// Задание 2
{
    function createCounter() {
        let counter = 0;
        return function () {
            return ++counter;
        }
    }

    const counter1 = createCounter();
    const counter2 = createCounter();

    console.log(counter1()); // 1
    console.log(counter1()); // 2


    console.log(counter2()); // 1
    console.log(counter2()); // 2
    console.log(counter2()); // 3
}



// Задание 3
{
    function spinWords(sentence) {
        return sentence
            .split(/\s+/g) // убираем все пробелы, табы между словами
            .map(word =>
                word.length >= 5
                    ? word.split("").reverse().join("")
                    : word)
            .join(" ");
    }

    const result1 = spinWords( "Привет от Legacy" )
    console.log(result1) // тевирП от ycageL

    const result2 = spinWords( "This is a test" )
    console.log(result2) // This is a test
}



// Задание 4
{
    function getElementsIndexes(nums, target) {
        for (let i = 0; i < nums.length; i++)
            for (let j = i; j < nums.length; j++)
                if (nums[i] + nums[j] === target)
                    return [i, j];

        return [];
    }

    const nums = [7, 0, 14, 15, 9, 4, 2], target = 9;

    const result = getElementsIndexes(nums, target);
    console.log(result); // [0, 6]
}



// Задание 5
{
    function getLargestPrefix(strings) {
        let prefix = strings[0].slice(-1);

        let prefixLength = 1;

        while(true) {

            for (let i = 0; i < strings.length; i++) {
                if(!strings[i].endsWith(prefix))
                    return prefix.slice(1).length > 1 ? prefix.slice(1) : '';
            }

            prefixLength++;
            prefix = strings[0].slice(-prefixLength);
        }
    }

    const strs1 = ["цветок","поток","хлопок"];
    const strs2 = ["ёлка", "полка", "иголка"];
    const strs3 = ['собака', 'мышеловка', 'сова']


    console.log(getLargestPrefix(strs1)); // ок
    console.log(getLargestPrefix(strs2)); // лка
    console.log(getLargestPrefix(strs3)); // ''
}