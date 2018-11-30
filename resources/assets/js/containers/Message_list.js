import React, { Component } from "react";
import { connect } from "react-redux";
import {Row, Col} from 'react-bootstrap';
import { bindActionCreators } from "redux";
import { fetchmessage, reset } from "../actions/index";
import { MessageListItem } from './Message_list_item';

class MessageList extends Component {
  componentDidMount(){
    if (document.getElementById('chatList')) {
      var data = document.getElementById('chatList').getAttribute('data');
    }
    this.props.reset();
    this.props.fetchmessage(data);
  }
  renderMessageList() {
    return this.props.message.message.map(comment => { return comment.map(
      comm => { return (
        <MessageListItem
        mess={comm}
        key={comm.id}
        />
      )
      });
    });
  }

  render() {

    return ( 
      
      <div>
        {/* <Row>
        <Col md={6}> */}
        {this.renderMessageList()}
        {/* </Col> */}
        {/* </Row>
        <br /> */}
      </div>
    );
  }
}

function mapStateToProps(state) {
  return { message : state
  };
}
function mapDispatchToProps(dispatch) {
  return bindActionCreators({ fetchmessage, reset }, dispatch);
}

export default connect(mapStateToProps,mapDispatchToProps)(MessageList);
