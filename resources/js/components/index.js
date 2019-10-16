import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class DutyList extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Bienvenido</div>

                            <div className="card-body">
                                Control de Bienes Yavirac
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('dutylist')) {
    ReactDOM.render(<DutyList />, document.getElementById('dutylist'));
}
