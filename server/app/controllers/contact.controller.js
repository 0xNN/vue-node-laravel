const db = require("../models");
const Contact = db.contacts;
const Op = db.Sequelize.Op;

// Create and Save a new Contact
exports.create = (req, res) => {
    // Validate request
    console.log(req.body.email);
    if (!req.body.nama) {
        res.status(400).send({
            message: "Form can not be empty!"
        });

        return;
    }

    // Create a Contact
    const contact = {
        nama: req.body.nama,
        nohp: req.body.nohp,
        email: req.body.email ? req.body.email : false
    };

    // Save Contact in the database
    Contact.create(contact)
    .then(data => {
        res.send(data);
    })
    .catch(err => {
        res.status(500).send({
            message:
            err.message || "Some error occurred while creating the Contact."
        });
    });
};

// Retrieve all Contact from the database.
exports.findAll = (req, res) => {
    const nama = req.query.nama;
    var condition = nama ? { nama: { [Op.like]: `%${nama}%` } } : null;

    Contact.findAll({ where: condition })
    .then(data => {
        res.send(data);
    })
    .catch(err => {
        res.status(500).send({
        message:
            err.message || "Some error occurred while retrieving contacts."
        });
    });
};

// Find a single Contact with an id
exports.findOne = (req, res) => {
    const id = req.params.id;

    Contact.findByPk(id)
    .then(data => {
        res.send(data);
    })
    .catch(err => {
        res.status(500).send({
            message: "Error retrieving Contact with id=" + id
        });
    });
};

// Update a Contact by the id in the request
exports.update = (req, res) => {
    const id = req.params.id;

    Contact.update(req.body, {
        where: { id: id }
    })
    .then(num => {
        if (num == 1) {
            res.send({
                message: "Contact was updated successfully."
            });
        } else {
            res.send({
                message: `Cannot update Contact with id=${id}. Maybe Contact was not found or req.body is empty!`
            });
        }
    })
    .catch(err => {
        res.status(500).send({
            message: "Error updating Contact with id=" + id
        });
    });
};

// Delete a Contact with the specified id in the request
exports.delete = (req, res) => {
    const id = req.params.id;

    Contact.destroy({
        where: { id: id }
    })
    .then(num => {
        if (num == 1) {
            res.send({
                message: "Contact was deleted successfully!"
            });
        } else {
            res.send({
            message: `Cannot delete Contact with id=${id}. Maybe Contact was not found!`
            });
        }
    })
    .catch(err => {
        res.status(500).send({
            message: "Could not delete Contact with id=" + id
        });
    });
};

// Delete all Contact from the database.
exports.deleteAll = (req, res) => {
    Contact.destroy({
        where: {},
        truncate: false
    })
    .then(nums => {
        res.send({ message: `${nums} Contact were deleted successfully!` });
    })
    .catch(err => {
        res.status(500).send({
            message: err.message || "Some error occurred while removing all contacts."
        });
    });
};