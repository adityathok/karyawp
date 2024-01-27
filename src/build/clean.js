const del = require("del");

del(['dist']).then( async() => {
    console.log('delete folder dist');
});