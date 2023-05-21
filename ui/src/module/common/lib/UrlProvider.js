const apiEndpoint = 'http://localhost:90/api';

const getHealthCheckUrl = () => {
    return apiEndpoint + '/healthCheck'
}

export default getHealthCheckUrl