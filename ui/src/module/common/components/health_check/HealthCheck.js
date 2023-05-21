import './HealthCheck.css';
import React, { Component } from 'react';
import getHealthCheckUrl from "../../lib/UrlProvider";

class HealthCheck extends Component {
    constructor(props) {
        super(props);
        this.state = {healthCheck: "Don't know"};
    }

    componentDidMount() {
        fetch(getHealthCheckUrl())
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        healthCheck: result.status
                    });
                }
            )
    }

    render() {
        const healthCheck = this.state.healthCheck;

        return (
            <div className="App">
                <header className="App-header">
                    Server status: {healthCheck}
                </header>
            </div>
        );
    }
}

export default HealthCheck;