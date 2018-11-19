import { FETCH_MESSAGE, RESET_ACTION } from "../actions/index";

const INITIAL_STATE = [];

export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_MESSAGE:
      return [action.payload.data, ...state];
    case RESET_ACTION:
      return INITIAL_STATE;
  } 
  return state;
}
