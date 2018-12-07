import React, { Component } from "react";
import { connect } from "react-redux";
import {
  Row,
  ButtonToolbar,
  Button,
  Pagination,
  PaginationItem,
  PaginationItemProps
} from "react-bootstrap";
import { bindActionCreators } from "redux";
import {
  fetchjobpost,
  reset,
  fetchjobcategory,
  fetchjobbypage
} from "../actions/index";
import { JobListItem } from "./Job_list_item";

class JobList extends Component {
  componentDidMount() {
    this.props.fetchjobpost("");
    this.props.fetchjobcategory();
  }
  handleClick(category) {
    this.props.reset();
    this.props.fetchjobpost(category);
  }
  handlePageClick(page) {
    this.props.reset();
    this.props.fetchjobbypage(page);
  }
  handlenextnull(page) {
    return (
      <div className="pagination" id={page.current_page}>
        <Pagination.First
          onClick={() => this.handlePageClick(page.first_page_url)}
        />
        <Pagination.Prev
          onClick={() => this.handlePageClick(page.prev_page_url)}
        />
        <Pagination.Item active>{page.current_page}</Pagination.Item>
        <Pagination.Next disabled />
        <Pagination.Last
          onClick={() => this.handlePageClick(page.last_page_url)}
        />
      </div>
    );
  }
  handlenonull(page) {
    return (
      <div className="pagination" id={page.current_page}>
        <Pagination.First
          onClick={() => this.handlePageClick(page.first_page_url)}
        />
        <Pagination.Prev
          onClick={() => this.handlePageClick(page.prev_page_url)}
        />
        <Pagination.Item active>{page.current_page}</Pagination.Item>
        <Pagination.Next
          onClick={() => this.handlePageClick(page.next_page_url)}
        />
        <Pagination.Last
          onClick={() => this.handlePageClick(page.last_page_url)}
        />
      </div>
    );
  }
  handlebothnull(page) {
    return (
      <div className="pagination" id={page.current_page}>
        <Pagination.First
          onClick={() => this.handlePageClick(page.first_page_url)}
        />
        <Pagination.Prev disabled />
        <Pagination.Item active>{page.current_page}</Pagination.Item>
        <Pagination.Next disabled />
        <Pagination.Last
          onClick={() => this.handlePageClick(page.last_page_url)}
        />
      </div>
    );
  }
  handleprevnull(page) {
    return (
      <div className="pagination" id={page.current_page}>
        <Pagination.First
          onClick={() => this.handlePageClick(page.first_page_url)}
        />
        <Pagination.Prev disabled />
        <Pagination.Item active>{page.current_page}</Pagination.Item>
        <Pagination.Next
          onClick={() => this.handlePageClick(page.next_page_url)}
        />
        <Pagination.Last
          onClick={() => this.handlePageClick(page.last_page_url)}
        />
      </div>
    );
  }
  renderCategory() {
    return this.props.category.category.map(comment => {
      return comment.map(comm => {
        return (
          <Button
            key={comm.id}
            bsStyle="warning"
            onClick={() => this.handleClick(comm.category)}
          >
            {comm.category}
          </Button>
        );
      });
    });
  }
  renderPagination() {
    var a = this.props.job.job;
    console.log(a);
    return a.map(page => {
      if (page.prev_page_url == null && page.next_page_url == null) {
        return this.handlebothnull(page);
      }
      else if (page.next_page_url == null) {
        return this.handlenextnull(page);
      } else if (page.prev_page_url == null) {
        return this.handleprevnull(page);
      } else {
        return this.handlenonull(page);
      }
    });
  }

  renderJobList() {
    return this.props.job.job.map(comment => {
      return comment.data.map(comm => {
        return <JobListItem jobs={comm} key={comm.id} />;
      });
    });
  }

  render() {
    return (
      <div>
        <Row>
          <ButtonToolbar>
            <Button
              key={99}
              bsStyle="warning"
              onClick={() => this.handleClick("")}
            >
              all
            </Button>
            {this.renderCategory()}
          </ButtonToolbar>
        </Row>
        <br />
        <Row>{this.renderJobList()}</Row>
        <Row>
          <Pagination size="lg">{this.renderPagination()}</Pagination>
        </Row>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return { job: state, category: state };
}
function mapDispatchToProps(dispatch) {
  return bindActionCreators(
    { fetchjobpost, reset, fetchjobcategory, fetchjobbypage },
    dispatch
  );
}

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(JobList);
