const apiEndpoint = 'http://localhost:90/api';

export const getLeadCreateUrl = () => {
    return apiEndpoint + '/lead/create'
}

export const getFindLeadByLeadIdUrl = () => {
    return apiEndpoint + '/lead'
}
