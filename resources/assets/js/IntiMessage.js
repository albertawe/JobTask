
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import React, { Component } from 'react';
import MessageList from './containers/Message_list';
import NewMessage from './containers/New_message';
import { CSSTransition } from 'react-transition-group';


class IntiMessage extends Component {
  render() {
    return (
      <div>
      <MessageList />
      <NewMessage />
      </div>
    );
  }
}

export default IntiMessage;
