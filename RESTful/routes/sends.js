const express = require('express');
const router = express.Router();
const sends = require('../services/sends');

/* GET sends */
router.get('/', async function(req, res, next) {
    try {
        res.json(await sends.getMultiple(req.query.page));
    } catch (err) {
        console.error(`Error while getting sends `, err.message);
        next(err);
    }
});

/* POST sends */
router.post('/', async function(req, res, next) {
    try {
        res.json(await sends.create(req.body));
    } catch (err) {
        console.error(`Error while creating send`, err.message);
        next(err);
    }
});

/* PUT send */
router.put('/:id', async function(req, res, next) {
    try {
        res.json(await sends.update(req.params.id, req.body));
    } catch (err) {
        console.error(`Error while updating send`, err.message);
        next(err);
    }
});

/* DELETE send */
router.delete('/:id', async function(req, res, next) {
    try {
        res.json(await sends.remove(req.params.id));
    } catch (err) {
        console.error(`Error while deleting send`, err.message);
        next(err);
    }
});

module.exports = router;