import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from "react-redux";
import { createStore, applyMiddleware } from "redux";
import ReduxPromise from "redux-promise";
import Inti from './Inti';
import reducers from "./reducers";
import './app.css';
const createStoreWithMiddleware = applyMiddleware(ReduxPromise)(createStore);
ReactDOM.render(
    <Provider store={createStoreWithMiddleware(reducers)}>
        <Inti />
    </Provider>, document.getElementById('root'));

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: http://bit.ly/CRA-PWA
// serviceWorker.unregister();
