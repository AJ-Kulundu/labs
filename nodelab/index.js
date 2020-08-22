const mysql = require('mysql2');
const express = require('express');
const app = express();
const Parser = require('body-parser');
app.use(Parser.urlencoded({extended: true}));

const connection = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'students'
});

connection.connect((err)=>{
    if(!err)
    console.log('Database Connected successfully');
    else
    console.log('Database Connection failed' + JSON.stringify(err,undefined,2));
})

port = process.env.PORT || 5000;

app.listen(port, ()=>{
    console.log('Server is running at http://localhost:5000');
});


//get students from the database
app.get('/api/v1/student',(req,res)=>{
    connection.query('SELECT * FROM student',(err,rows, fields)=>{
         const page = req.query.page;
         const limit = req.query.limit;

         const startIndex = (page - 1) * limit;
         const endIndex = page * limit;

         rows.slice(startIndex,endIndex);

        if(!err){
         res.json(rows);
        }
        else
        console.log(err);
    });
});

//get student by id

app.get('/api/v1/student/:id',(req,res)=>{
    connection.query('SELECT * FROM student WHERE id = ? ',[req.params.id],(err,rows, fields)=>{
        if(!err){
         res.send(rows);
        }
        else
        console.log(err);
    });
});

//delete a student
app.delete('/api/v1/student/:id',(req,res)=>{
    connection.query('DELETE FROM student WHERE id = ? ',[req.params.id],(err,rows, fields)=>{
        if(!err){
         res.send('Deleted successfuly');
        }
        else
        console.log(err);
    });
});

//insert a student
app.post('/api/v1/student',(req,res)=>{
    var sql ="insert into student values(null,'"+ req.body.first_name +"','"+ req.body.last_name+"','"+ Course +"')";
    mysqlconnection.query(sql,function(err,rows,fields){
        console.log(req.body);
  
        if(!err){
            res.send('Saved successfuly');
           }
           else
           console.log(err);
        });

    });
