import React from 'react'
import { connect } from 'react-redux'
import { HashRouter as Router, Route, Link } from 'react-router-dom'
import App from './containers/App'
import List from './containers/List'

@connect (state => state)
export default class MainRouter extends React.Component {
  render() {
    return (
      <div>
        <ul>
          <li><Link to="/">index</Link></li>
          <li><Link to="/list">index</Link></li>
        </ul>
        <Router>
            <div>
              <Route exact path="/" component={App}></Route>
              <Route path="/list" component={List}></Route>
            </div>
        </Router>
      </div>
    );
  }
}