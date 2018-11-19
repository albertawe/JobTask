import { FETCH_JOBPOST, RESET_ACTION } from "../actions/index";

const INITIAL_STATE = [];


export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_JOBPOST:
      console.log([action.payload.data, ...state]);
      return [action.payload.data, ...state];
    case RESET_ACTION:
      return INITIAL_STATE;
  } 
  return state;
}
