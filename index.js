const data = require('./data/hizbs.json');
const hizbs = data.hizbs;

module.exports = {
    hizbs,
    getHizbById: (id) => hizbs.find(h => h.id === id),
    getHizbByOrderUp: (order) => hizbs.find(h => h.order_up_to_down === order),
    getHizbByOrderDown: (order) => hizbs.find(h => h.order_down_to_top === order),
    listAll: () => hizbs
};
