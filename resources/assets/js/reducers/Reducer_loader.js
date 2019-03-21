import { START_LOAD, STOP_LOAD } from "../actions/index";

const INITIAL_STATE = {
    isFetching: false
};

export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case START_LOAD:
      return Object.assign({}, state, {
        isFetching: true,
      });
    case STOP_LOAD:
    return Object.assign({}, state, {
        isFetching: false,
      });
  }
  return state;
}
