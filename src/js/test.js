/**
 * Class Test
 * @param {object} options [description]
 */
module.exports = Test = function (options) {
  this.msg = 'Hello, World!';
};

Test.prototype.getMsg = function () {
  console.log(this.msg);
};
