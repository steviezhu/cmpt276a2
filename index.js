const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000
var app = express();

const { Pool } = require('pg');
var pool;
pool = new Pool({
  connectionString: process.env.DATABASE_URL
});

app.use(express.static(path.join(__dirname, 'public')));
app.use(express.json());
app.use(express.urlencoded({extended:false}));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.get('/', (req, res) => res.render('pages/index'));
app.get('/tokimon', (req,res) => res.render('pages/tokimon'));
app.post('/insert', (req, res) => {
  var nTokiName = req.body.tokiName;
  if(typeof req.body.tokiWeight !== 'undefined' && req.body.tokiWeight){
    var nTokiWeight = parseInt(req.body.tokiWeight);
  }
  else{
    var nTokiWeight = 0;
  }
  if(typeof req.body.tokiHeight !== 'undefined' && req.body.tokiHeight){
    var nTokiHeight = parseInt(req.body.tokiHeight);
  }
  else{
    var nTokiHeight = 0;
  }
  if(typeof req.body.tokiFly !== 'undefined' && req.body.tokiFly){
    var nTokiFly = parseInt(req.body.tokiFly);
  }
  else{
    var nTokiFly = 0;
  }
  if(typeof req.body.tokiFight !== 'undefined' && req.body.tokiFight){
    var nTokiFight = parseInt(req.body.tokiFight);
  }
  else{
    var nTokiFight = 0;
  }
  if(typeof req.body.tokiFire !== 'undefined' && req.body.tokiFire){
    var nTokiFire = parseInt(req.body.tokiFire);
  }
  else{
    var nTokiFire = 0;
  }
  if(typeof req.body.tokiWater !== 'undefined' && req.body.tokiWater){
    var nTokiWater = parseInt(req.body.tokiWater);
  }
  else{
    var nTokiWater = 0;
  }
  if(typeof req.body.tokiElectric !== 'undefined' && req.body.tokiElectric){
    var nTokiElectric = parseInt(req.body.tokiElectric);
  }
  else{
    var nTokiElectric = 0;
  }
  if(typeof req.body.tokiIce !== 'undefined' && req.body.tokiIce){
    var nTokiIce = parseInt(req.body.tokiIce);
  }
  else{
    var nTokiIce = 0;
  }
  var nTokiTrainer = req.body.tokiTrainer;
  var nTokiTotal = nTokiFly + nTokiFight + nTokiFire + nTokiWater + nTokiElectric + nTokiIce;
  
  var insertQuery = `INSERT INTO tokimon_table (name, weight, height, fly, fight, fire, water, electric, ice, total, trainer_name)
                      VALUES ('${nTokiName}', ${nTokiWeight}, ${nTokiHeight}, ${nTokiFly}, ${nTokiFight}, ${nTokiFire}, ${nTokiWater}, ${nTokiElectric}, ${nTokiIce}, ${nTokiTotal}, '${nTokiTrainer}')`;

  pool.query(insertQuery, (error,result) => {
    if(error){
      res.end(error);
    }
  });

  res.render('pages/insert', {nTokiName});
});

app.post('/getIDUpdate', (req,res) => {
  var updateName = req.body.updateTokimon;
  var findQuery = `SELECT * FROM tokimon_table WHERE name='${updateName}'`;
  pool.query(findQuery, (error,result) => {
    if(error){
      res.end(error);
    }
    var results = result.rows;
    res.render('pages/getIDUpdate', {results});
  });
})

app.post('/update', (req,res) => {
  var updateTokiID = req.body.updateID;
  var IDQuery = `SELECT * FROM tokimon_table where id=${updateTokiID}`;
  pool.query(IDQuery, (error,result) => {
    if(error){
      res.end(error);
    }
    var results = result.rows;
    res.render('pages/update', {results});
  });
})

app.post('/updateValues', (req,res) => {
  var tokimonID = req.body.tokiID;
  if(typeof req.body.tokiName !== 'undefined' && req.body.tokiName){
    var updateQuery = `UPDATE tokimon_table SET name = '${req.body.tokiName}' WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiWeight !== 'undefined' && req.body.tokiWeight){
    var updateQuery = `UPDATE tokimon_table SET weight = ${req.body.tokiWeight} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiHeight !== 'undefined' && req.body.tokiHeight){
    var updateQuery = `UPDATE tokimon_table SET height = ${req.body.tokiHeight} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiFly !== 'undefined' && req.body.tokiFly){
    var updateQuery = `UPDATE tokimon_table SET fly = ${req.body.tokiFly} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiFight !== 'undefined' && req.body.tokiFight){
    var updateQuery = `UPDATE tokimon_table SET fight = ${req.body.tokiFight} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiFire !== 'undefined' && req.body.tokiFire){
    var updateQuery = `UPDATE tokimon_table SET fire = ${req.body.tokiFire} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiWater !== 'undefined' && req.body.tokiWater){
    var updateQuery = `UPDATE tokimon_table SET water = ${req.body.tokiWater} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiElectric !== 'undefined' && req.body.tokiElectric){
    var updateQuery = `UPDATE tokimon_table SET electric = ${req.body.tokiElectric} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiIce !== 'undefined' && req.body.tokiIce){
    var updateQuery = `UPDATE tokimon_table SET ice = ${req.body.tokiIce} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  if(typeof req.body.tokiTrainer !== 'undefined' && req.body.tokiTrainer){
    var updateQuery = `UPDATE tokimon_table SET trainer_name = '${req.body.tokiTrainer}' WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }
  var newTotal = parseInt(req.body.tokiFly) + parseInt(req.body.tokiFight) + parseInt(req.body.tokiFire) + parseInt(req.body.tokiWater) + parseInt(req.body.tokiElectric) + parseInt(req.body.tokiIce);
  if(typeof newTotal !== 'undefined' && newTotal){
    var updateQuery = `UPDATE tokimon_table SET total = ${newTotal} WHERE id = ${tokimonID}`
    pool.query(updateQuery, (error,result) => {
      if(error){
        res.end(error);
      }
    });
  }

  res.render('pages/finishedUpdate');
})

app.post('/getIDDelete', (req,res) => {
  var updateName = req.body.deleteTokimon;
  var findQuery = `SELECT * FROM tokimon_table WHERE name='${updateName}'`;
  pool.query(findQuery, (error,result) => {
    if(error){
      res.end(error);
    }
    var results = result.rows;
    res.render('pages/getIDDelete', {results});
  });
})

app.post('/delete', (req,res) => {
  var deleteTokiID = req.body.deleteID;
  var IDQuery = `DELETE FROM tokimon_table where id=${deleteTokiID}`;
  pool.query(IDQuery, (error,result) => {
    if(error){
      res.end(error);
    }
    res.render('pages/delete');
  });
})


app.listen(PORT, () => console.log(`Listening on ${ PORT }`));
