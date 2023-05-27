const apiEndpoint = 'http://localhost:90/api';

export const getLeadCreateUrl = () => {
    return apiEndpoint + '/lead/create'
}

export const getFindLeadByLeadIdUrl = () => {
    return apiEndpoint + '/lead'
}

export const getUpdateLeadUrl = () => {
    return apiEndpoint + '/lead/update'
}

export const getLeadListUrl = () => {
    return apiEndpoint + '/lead/list'
}