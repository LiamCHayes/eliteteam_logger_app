const db = require('./db');
const helper = require('../helper');
const config = require('../config');

async function getMultiple(page = 1){
    const offset = helper.getOffset(page, config.listPerPage);
    const rows = await db.query(
        `SELECT sends_id, date, grade, flash, L_zone_id, L_teammembers_id 
        FROM sends LIMIT ${offset},${config.listPerPage}`
    );
    const data = helper.emptyOrRows(rows);
    const meta = {page};

    return {
        data,
        meta
    }
}

async function create(send){
    const result = await db.query(
      `INSERT INTO sends 
      (sends_id, date, grade, flash, L_zone_id, L_teammembers_id) 
      VALUES 
      (${send.sends_id}, ${send.date}, ${send.grade}, ${send.flash}, ${send.L_zone_id}, ${send.L_teammembers_id})`
    );
  
    let message = 'Error in creating send';
  
    if (result.affectedRows) {
      message = 'Send created successfully';
    }
  
    return {message};
}

async function update(id, send){
    const result = await db.query(
        `UPDATE sends 
        SET date="${send.date}", grade=${send.grade}, flash=${send.flash}, L_zone_id=${send.L_zone_id}, L_teammembers_id=${send.L_teammembers_id}
        WHERE sends_id=${id}` 
    );

    let message = 'Error in updating send';

    if (result.affectedRows) {
        message = 'Send updated successfully';
    }

    return {message};
}

async function remove(id){
    const result = await db.query(
        `DELETE FROM sends WHERE sends_id=${id}`
    );

    let message = 'Error in deleting send';

    if (result.affectedRows) {
        message = 'Send deleted successfully';
    }

    return {message};
}

module.exports = {
    getMultiple,
    create,
    update,
    remove
}