import React, { Component } from "react";
import { connect } from "react-redux";
import {Row, ButtonToolbar, Button} from 'react-bootstrap';
import { bindActionCreators } from "redux";
import { fetchjobpost, reset, fetchjobcategory } from "../actions/index";
import { JobListItem } from './Job_list_item';

class JobList extends Component {
  
  componentDidMount(){
    this.props.fetchjobpost('');
    this.props.fetchjobcategory();
  }
  // componentDidMount() {
  //   console.log(this.props.job);
  // }
  // handleClick(category){
  //   return () =>{
  //     this.setState({
          
  //     })
  //   }
  // }
  handleClick(category){
    this.props.reset();
    this.props.fetchjobpost(category);
  }

  renderCategory(){
    return this.props.category.category.map(comment => { return comment.map(
      comm => { return (
          <Button key={comm.id} bsStyle="warning" onClick={() => this.handleClick(comm.category)}>{comm.category}</Button>
      )
      });
    });
  }

  renderJobList() {
    //console.log(this.props.job.job[0])
    // return this.props.job.job.map(comment => {
    //   return <li key={comment.id}>{comment.title}</li>;
    // });
    return this.props.job.job.map(comment => { return comment.map(
      comm => { return (
        <JobListItem
        jobs={comm}
        key={comm.id}
        />
      )
      });
    });
  }

  render() {
    const { post } = this.props;

    if (!post) {
      return <div>Loading...</div>;
    }
    return (
      <div>
        <Row>
        <ButtonToolbar>
        {this.renderCategory()}
        </ButtonToolbar>
        </Row>
        <br />
        <Row>
        {this.renderJobList()}
        </Row>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return { job: state,
           category: state
  };
}
function mapDispatchToProps(dispatch) {
  return bindActionCreators({ fetchjobpost, reset, fetchjobcategory }, dispatch);
}

export default connect(mapStateToProps,mapDispatchToProps)(JobList);
