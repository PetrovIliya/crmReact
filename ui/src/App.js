import './App.css';
import React, { Component } from 'react';
import getHealthCheckUrl from "./util/UrlProvider";



class App extends Component {
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
        // get the status from the state
        const healthCheck = this.state.healthCheck;

        return (
            <div className="App">
                <header className="App-header">
                    Server HealthCheck status: {healthCheck}
                </header>
            </div>
        );
    }
}

export default App;