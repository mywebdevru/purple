export const is404 = function (e) {
    return isErrorWithResponseAndStatus(e) && e.response.status === 404;
}

export const is422 = function (e) {
    return isErrorWithResponseAndStatus(e) && e.response.status === 422;
}

const isErrorWithResponseAndStatus = function(e) {
    return e.response && e.response.status;
}
