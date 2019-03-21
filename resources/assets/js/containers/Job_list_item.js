import React from "react";
import {Col} from 'react-bootstrap';

export const JobListItem = ( jobs ) => {
    return(
        <Col md={4} sm={6} key={jobs.jobs.id}>
        <div className="blog-entry">
            <div className="desc">
            <h3><a href={'/viewtask/' + jobs.jobs.id}>{jobs.jobs.title}</a></h3>
                <span>Due Date: <small>{jobs.jobs.due_date}</small><br />
                Category: <small>{jobs.jobs.job_category}</small><br />
                Type: <small>{jobs.jobs.job_type}</small><br />
                Description: <small>{jobs.jobs.job_description}</small></span>
        </div>
        </div>
        </Col>
    )};

//export default JobListItem;