import React from "react";
import { Col } from "react-bootstrap";

export const MessageListItem = mess => {
  return (
    <Col>
      <div className="blog-entry">
        <div className="desc">
          <h3>
               {mess.mess.user.user_profile.first_name}
                {' '} {mess.mess.user.user_profile.last_name}
          </h3>
          <span>
            <small>{mess.mess.content}</small>
            <br />
          </span>
        </div>
      </div>
    </Col>
  );
};

//export default JobListItem;
