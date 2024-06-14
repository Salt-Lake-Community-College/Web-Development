// Animal constructor
function Animal(name, species, age, sound) {
    this.name = name;
    this.species = species;
    this.age = age;
    this.sound = sound;
    this.speak = function() {
      console.log(`${this.name} the ${this.species} ${this.sound}s`);
    };
  }
  
  // Creating instances of Animal
  var lion = new Animal("Simba", "Lion", 5, "Roar");
  var elephant = new Animal("Dumbo", "Elephant", 10, "Trumpet");
  var dog = new Animal("Fido", "Dog", 2, "Bark");
  
  // Adding animals to a JSON like array
  let animalArray = [lion, elephant, dog];
  
  // Accessing properties and invoking methods
  console.log(lion.name);       // Output: Simba
  console.log(elephant.age);    // Output: 10
  console.log(dog.species);     // Output: dog
  lion.speak();                 // Output: Simba the Lion Roars.
  console.log(animalArray);     // Output: [{lion},{elephant},{dog}]
  console.log(animalArray[0].age); // Output: 5
  