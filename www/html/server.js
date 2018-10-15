// console.log('May Node be with you');
const express = require('express');
const bodyParser = require('body-parser');
const app = express();
//const MongoClient = require('mongodb').MongoClient;
const dbConfig = require('./config/database.config.js');
var mongoose = require('mongoose')
var db;
var Note = require('./app/models/note.model.js')
require('./app/routes/note.routes.js')(app);

app.use(bodyParser.urlencoded({extended: true}))

// parse requests of content-type - application/json
app.use(bodyParser.json())

mongoose.Promise = global.Promise;

// app.listen(3333, function() {
//     console.log('listening on 3333')
// })

mongoose.connect(dbConfig.url, {
    useNewUrlParser: true
}).then(() => {
    console.log("Successfully connected to the database");
    app.listen(3000, () => {
        console.log('listening on 3000')
    })    
}).catch(err => {
    console.log('Could not connect to the database. Exiting now...', err);
    process.exit();
});

app.get('/', (req, res) => {
    //res.send('Hello World')
    res.sendFile(__dirname + '/index1.html')
    //res.json({"message": "Welcome to EasyNotes application. Take notes quickly. Organize and keep track of all your notes."});

})

app.post('/quotes', (req, res) => {
    var input = req.body;
    console.log(input);
    var inputToDb = new Note(input);
    inputToDb.save(function(err) {
        if (err) throw err;

        console.log('Note created and saved to database!');
    })
    // db.collection('quotes').save(req.body, (err, result) => {
    //   if (err) return console.log(err)
  
    //   console.log('saved to database')
      res.redirect('/')
    // })
})