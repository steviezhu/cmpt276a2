const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000
var app = express();

const { Pool } = require('pg');
var pool;
pool = new Pool({
  connectionString: "postgres://postgres:1234@localhost/tokimon_database"
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

});
app.listen(PORT, () => console.log(`Listening on ${ PORT }`));
