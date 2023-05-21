
const getEnv = (envName) => {
    const a = process.env;
    return process.env[envName];
}
export default getEnv