import { combineReducers } from "redux";
import { reducer as formReducer } from "redux-form";
import JobPostReducer from "./Reducer_jobpost";
import JobCategoryReducer from "./Reducer_category";
import MessageReducer from "./Reducer_message";
import LoaderReducer from "./Reducer_loader";

const rootReducer = combineReducers({
  job: JobPostReducer,
  category: JobCategoryReducer,
  message: MessageReducer,
  form: formReducer,
  load: LoaderReducer
});

export default rootReducer;
