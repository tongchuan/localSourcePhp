import React from 'react'
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux'
import * as userAction from '../actions/userAction'

@connect(
  state => state,
  dispatch => bindActionCreators({...userAction}, dispatch)
  // dispatch => bindActionCreators({...userAction, ...newsAction}, dispatch)
)
export default class App extends React.Component {
  
  constructor (props) {
    super(props)
  }

  render () {
    return (
      <div>
        <img src={require('../assets/1.jpg')} />
      List{JSON.stringify(this.props)}</div>
    )
  }
}