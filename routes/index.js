var express = require('express');
var router = express.Router();

/* GET home page. */
router.all('/', function(req, res, next) {
  res.render('index', { title: 'Matcha'});
});

router.all("/feed", function(req, res) {
  res.render('index', { title: 'Feed'});
});

module.exports = router;