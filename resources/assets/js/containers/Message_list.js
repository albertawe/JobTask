import React, { Component } from "react";
import { connect } from "react-redux";
import {Row, ButtonToolbar, Fade} from 'react-bootstrap';
import { bindActionCreators } from "redux";
import { fetchmessage, reset } from "../actions/index";
import { MessageListItem } from './Message_list_item';

class MessageList extends Component {
   constructor(props, context) {
    super(props, context);

    this.state = {
      open: false
    };
  }
  componentDidMount(){
    if (document.getElementById('chatList')) {
      var data = document.getElementById('chatList').getAttribute('data');
    }
    this.props.reset();
    this.props.fetchmessage(data);
  }
  renderMessageList() {
    this.setState({ open: !this.state.open });
    return this.props.message.message.map(comment => { return comment.map(
      comm => { return (
        <Fade in={this.state.open}>
        <MessageListItem
        mess={comm}
        key={comm.id}
        />
        </Fade>
      )
      });
    });
  }

  render() {

    return ( 
      
      <div>
        <Row>
        <ButtonToolbar>
        {this.renderMessageList()}
        </ButtonToolbar>
        </Row>
        <br />
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
