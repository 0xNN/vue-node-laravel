module.exports = (sequelize, Sequelize) => {
    const Contact = sequelize.define("contact", {
        nama: {
            type: Sequelize.STRING
        },
        nohp: {
            type: Sequelize.STRING
        },
        email: {
            type: Sequelize.STRING
        }
    });
    
    return Contact;
};