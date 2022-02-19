let util = {

};
util.title = function (title) {
    title = title ? title + ' - 管理系统后台' : 'View UI project';
    window.document.title = title;
};

export default util;
