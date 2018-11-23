import { FETCH_JOBPOST, RESET_ACTION, FETCH_JOBPOSTBYPAGE } from "../actions/index";

const INITIAL_STATE = [];


export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_JOBPOST:
      return [action.payload.data, ...state];
    case FETCH_JOBPOSTBYPAGE:
      return [action.payload.data, ...state];
    case RESET_ACTION:
      return INITIAL_STATE;
  } 
  return state;
}
