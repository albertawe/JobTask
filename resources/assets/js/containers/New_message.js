import React, { Component } from "react";
import { Field, reduxForm } from "redux-form";
import { connect } from "react-redux";
import { PostMessage, fetchmessage, reset } from "../actions";
import { bindActionCreators } from "redux";

class NewMessage extends Component {

  renderField(field) {
    const { meta: { touched, error } } = field;
    const className = `form-group ${touched && error ? "has-danger" : ""}`;

    return (
      <div className={className}>
        <label>{field.label}</label>
        <input className="form-control" type="text" {...field.input} />
        <div className="text-help">
          {touched ? error : ""}
        </div>
      </div>
    );
  }

  onSubmit(values) {
    if (document.getElementById('chatList')) {
        var data = document.getElementById('chatList').getAttribute('data');
      }
    if (document.getElementById('chatList')) {
        var datauser = document.getElementById('chatList').getAttribute('datauser');
      }
    values.uid = datauser;
    this.props.PostMessage(data,values);
    this.props.reset();
    this.props.fetchmessage(data);
  }

  render() {
    const { handleSubmit } = this.props;

    return (
      <form onSubmit={handleSubmit(this.onSubmit.bind(this))} style={{width: 250}}>
        <Field
          label="Chat Content"
          name="content"
          component={this.renderField}
        />
        <button type="submit" className="btn btn-primary">Send</button>
      </form>
    );
  }
}

function validate(values) {
  // console.log(values) -> { title: 'asdf', categories: 'asdf', content: 'asdf' }
  const errors = {};

  // Validate the inputs from 'values'
  if (!values.content) {
    errors.content = "Enter some message please";
  }

  // If errors is empty, the form is fine to submit
  // If errors has *any* properties, redux form assumes form is invalid
  return errors;
}

function mapDispatchToProps(dispatch) {
    return bindActionCreators({ fetchmessage, reset, PostMessage }, dispatch);
  }

export default reduxForm({
  validate,
  form: "PostsNewForm"
})(connect(null, mapDispatchToProps)(NewMessage));
