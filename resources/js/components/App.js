import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import NavBar from './NavBar'
import About from './About'
import User from './User'
import Top from './Top'

function App() {
    return (
    <Router>
        <div>
            <NavBar />
            <Switch>
                <Route path="/react_test" exact component={Top} />
                <Route path="/about" component={About} />
                <Route path="/user" component={User} />
            </Switch>
        </div>
    </Router>
    )
}

if (document.getElementById('react')) {
    ReactDOM.render(<App />, document.getElementById('react'));
}