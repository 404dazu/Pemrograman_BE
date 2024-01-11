// ES 6
const pi = 3;
let radius = 5;

// ES 6 Arrow Function
const areaCalculate = (radius) => {
  return pi * Math.pow(radius, 2);
};

// Modul Common JS
const area = areaCalculate(radius);
console.log(`Area dari Lingkaran adalah ${area}`);

// Object Destructing
const person = { name: "Daffa", age: 30, location: "Bekasi" };

const { name, age, location } = person;
console.log(`Name: ${name}, Age: ${age}, Location: ${location}`);
