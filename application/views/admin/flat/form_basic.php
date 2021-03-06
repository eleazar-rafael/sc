
<div class="page-header">
    <div class="pull-left">
        <h1>Basic forms</h1>
    </div>
    <div class="pull-right">
        <ul class="minitiles">
            <li class='grey'>
                <a href="#"><i class="icon-cogs"></i></a>
            </li>
            <li class='lightgrey'>
                <a href="#"><i class="icon-globe"></i></a>
            </li>
        </ul>
        <ul class="stats">
            <li class='satgreen'>
                <i class="icon-money"></i>
                <div class="details">
                        <span class="big">$324,12</span>
                        <span>Balance</span>
                </div>
            </li>
            <li class='lightred'>
                <i class="icon-calendar"></i>
                <div class="details">
                    <span class="big">February 22, 2013</span>
                    <span>Wednesday, 13:56</span>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="breadcrumbs">
    <ul>
        <li>
            <a href="more-login.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="forms-basic.html">Forms</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="forms-basic.html">Basic forms</a>
        </li>
    </ul>
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-title">
                <h3><i class="icon-edit"></i> Basic forms</h3>
            </div>
            <div class="box-content">
                <form action="#" method="POST" class='form-horizontal'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" class="input-xlarge">
                            <span class="help-block">This is just a supporting text</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password" placeholder="*********" class="input-xlarge">
                            <span class="help-block">Minimum length: 9, only numeric</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="file" class="control-label">File-input</label>
                        <div class="controls">
                            <input type="file" name="file" id="file" class="input-block-level">
                            <span class="help-block">Only .jpg (Max Size: 100MB)</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="select" class="control-label">Select</label>
                        <div class="controls">
                            <select name="select" id="select" class='input-large'>
                                <option value="1">Option-1</option>
                                <option value="2">Option-2</option>
                                <option value="3">Option-3</option>
                                <option value="4">Option-4</option>
                                <option value="5">Option-5</option>
                                <option value="6">Option-6</option>
                                <option value="7">Option-7</option>
                                <option value="8">Option-8</option>
                                <option value="9">Option-9</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes</label>
                        <div class="controls">
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                            </label>
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> ipsum eiusmod
                            </label>
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Eiusmod lorem ipsum
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Radios</label>
                        <div class="controls">
                            <label class='radio'>
                                    <input type="radio" name="radio"> Lorem
                            </label>
                            <label class='radio'>
                                    <input type="radio" name="radio"> Ipsum
                            </label>
                            <label class='radio'>
                                    <input type="radio" name="radio"> Eiusmod
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                            <textarea name="textarea" id="textarea" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Striped form</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-horizontal form-striped'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes<small>More information here</small></label>
                        <div class="controls">
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                            </label>
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> ipsum eiusmod
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                                <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                    <h3><i class="icon-th-list"></i> Bordered form</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-horizontal form-bordered'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes<small>More information here</small></label>
                        <div class="controls">
                                <label class='checkbox'>
                                        <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                                </label>
                                <label class='checkbox'>
                                        <input type="checkbox" name="checkbox"> ipsum eiusmod
                                </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                                <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Vertical form</h3>
            </div>
            <div class="box-content">
                <form action="#" method="POST" class='form-vertical'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes<small>More information here</small></label>
                        <div class="controls">
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                            </label>
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> ipsum eiusmod
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                            <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Vertical bordered form</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-vertical form-bordered'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes<small>More information here</small></label>
                        <div class="controls">
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                            </label>
                            <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> ipsum eiusmod
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                                <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Vertical striped form</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-vertical form-bordered form-striped'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes<small>More information here</small></label>
                        <div class="controls">
                                <label class='checkbox'>
                                        <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                                </label>
                                <label class='checkbox'>
                                        <input type="checkbox" name="checkbox"> ipsum eiusmod
                                </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                                <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                    <h3><i class="icon-th-list"></i> Colored</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-horizontal form-bordered'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Text input</label>
                        <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Checkboxes<small>More information here</small></label>
                        <div class="controls">
                                <label class='checkbox'>
                                        <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                                </label>
                                <label class='checkbox'>
                                        <input type="checkbox" name="checkbox"> ipsum eiusmod
                                </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textarea" class="control-label">Textarea</label>
                        <div class="controls">
                                <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-title">
                    <h3><i class="icon-list"></i> Column form</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-horizontal form-column form-bordered'>
                    <div class="span6">
                        <div class="control-group">
                            <label for="textfield" class="control-label">Text input</label>
                            <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Checkboxes<small>More information here</small></label>
                            <div class="controls">
                                <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                                </label>
                                <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> ipsum eiusmod
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="textarea" class="control-label">Textarea</label>
                            <div class="controls">
                                <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="control-group">
                            <label for="textfield" class="control-label">Text input</label>
                            <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password input" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Checkboxes<small>More information here</small></label>
                            <div class="controls">
                                <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> Lorem ipsum eiusmod
                                </label>
                                <label class='checkbox'>
                                    <input type="checkbox" name="checkbox"> ipsum eiusmod
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="textarea" class="control-label">Textarea</label>
                            <div class="controls">
                                    <textarea name="textarea" id="textarea" rows="5" class="input-block-level">Lorem ipsum mollit minim fugiat tempor dolore sit officia ut dolore. </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="span12">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-list-ul"></i> Element settings</h3>
            </div>
            <div class="box-content nopadding">
                <form action="#" method="POST" class='form-horizontal form-bordered'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Uneditable-only</label>
                        <div class="controls">
                            <span class="uneditable-input">Just some input</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Disabled input</label>
                        <div class="controls">
                                <input type="text" name="textfield" id="textfield" placeholder="Small input" class="input-xlarge" disabled>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Small input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Small input" class="input-small">
                            <span class="help-block">
                                    <code>.input-small</code>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Medium input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Medium input" class="input-medium">
                            <span class="help-block">
                                    <code>.input-medium</code>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Large input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Large input" class="input-large">
                            <span class="help-block">
                                    <code>.input-large</code>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">X-Large input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="X-Large input" class="input-xlarge">
                            <span class="help-block">
                                    <code>.input-xlarge</code>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">XX-Large input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="X-Large input" class="input-xxlarge">
                            <span class="help-block">
                                    <code>.input-xxlarge</code>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Block-level input</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Block-level input" class="input-block-level">
                            <span class="help-block">
                                    <code>.input-block-level</code>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Multiple select</label>
                        <div class="controls">
                            <select name="a" id="a" multiple="multiple">
                                <option value="1">Option-1</option>
                                <option value="2">Option-2</option>
                                <option value="3">Option-3</option>
                                <option value="4">Option-4</option>
                                <option value="5">Option-5</option>
                                <option value="6">Option-6</option>
                                <option value="7">Option-7</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group success">
                        <label for="textfield" class="control-label">Success state</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Success" class="span4">
                            <span class="help-inline">
                                    Good job.
                            </span>
                        </div>
                    </div>
                    <div class="control-group warning">
                        <label for="textfield" class="control-label">Warning state</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Warning" class="span4">
                            <span class="help-inline">
                                    Oh wait! Check your settings again.
                            </span>
                        </div>
                    </div>
                    <div class="control-group error">
                        <label for="textfield" class="control-label">Error state</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Error" class="span4">
                            <span class="help-inline">
                                    There seems to be an error
                            </span>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label for="textfield" class="control-label">Info state</label>
                        <div class="controls">
                            <input type="text" name="textfield" id="textfield" placeholder="Info" class="span4">
                            <span class="help-inline">
                                    Just a little information!
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered red">
            <div class="box-title">
                <h3>
                        <i class="icon-th"></i> Label above input (grid)
                </h3>
            </div>
            <div class="box-content">
                <form action="#" method="get" class='form-vertical'>
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 3</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 3</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 3</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 3</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 4</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 4</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 4</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span1">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 1</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 11</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 2</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span10">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 10</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 3</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span9">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 9</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 4</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span8">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 8</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span5">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 5</label>
                                <div class="controls controls-row">
                                        <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span7">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 7</label>
                                <div class="controls controls-row">
                                    <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label for="textfield" class="control-label">Label 6</label>
                                <div class="controls controls-row">
                                        <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label for="textfield" class="control-label">label 6</label>
                                <div class="controls controls-row">
                                        <input type="text" name="textfield" id="textfield" placeholder="Text input" class="input-block-level">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-title">
                <h3><i class="icon-th"></i> Grid sizing</h3>
            </div>
            <div class="box-content">
                <form action="#" method="get" class='form-horizontal'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 1-11</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span1" class="span1">
                            <input type="text" name="textfield" id="textfield" placeholder=".span11" class="span11">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 2-10</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span2" class="span2">
                            <input type="text" name="textfield" id="textfield" placeholder=".span10" class="span10">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 3-9</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span3" class="span3">
                            <input type="text" name="textfield" id="textfield" placeholder=".span9" class="span9">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 4-8</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span4" class="span4">
                            <input type="text" name="textfield" id="textfield" placeholder=".span8" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 5-7</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span5" class="span5">
                            <input type="text" name="textfield" id="textfield" placeholder=".span7" class="span7">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 6-6</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span6" class="span6">
                            <input type="text" name="textfield" id="textfield" placeholder=".span6" class="span6">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 7-5</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span7" class="span7">
                            <input type="text" name="textfield" id="textfield" placeholder=".span5" class="span5">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 8-4</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span8" class="span8">
                            <input type="text" name="textfield" id="textfield" placeholder=".span4" class="span4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 9-3</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span9" class="span9">
                            <input type="text" name="textfield" id="textfield" placeholder=".span3" class="span3">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 10-2</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span10" class="span10">
                            <input type="text" name="textfield" id="textfield" placeholder=".span2" class="span2">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Row 11-1</label>
                        <div class="controls controls-row">
                            <input type="text" name="textfield" id="textfield" placeholder=".span11" class="span11">
                            <input type="text" name="textfield" id="textfield" placeholder=".span1" class="span1">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
			
