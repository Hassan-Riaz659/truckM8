import React, { Component } from 'react';
import { browserHistory } from 'react-router';
import { Link } from 'react-router-dom';

class TableRow extends Component {
  constructor(props) {
      super(props);
  }
  render() {
    return (
        <tr>
          <td>
          {this.props.obj.name}
          </td>
          <td>
            {this.props.obj.zip}
          </td>
          <td>
          {this.props.obj.employees_count}
          </td>
        </tr>
    );
  }
}
export default TableRow;