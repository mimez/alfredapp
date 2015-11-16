<?php
namespace Mimez\AlfredApp\Results;

class Result
{
    /**
     * The uid attribute is a value that is used to help Alfred learn about your results. You know that Alfred learns
     * based on the items you use the most. That same mechanism can be used in feedback results. Give your results a
     * unique identifier and Alfred will learn which ones you use the most and prioritize them by moving them up in the
     * result list.
     *
     * As of Alfred 2.0.3, this attribute is now optional. If no uid is provided, Alfred will simply generate a UUID.
     * This will allow you to maintain a specific order of generated feedback. Previously, the uid (if not unique for
     * each result) would be added to Alfred's knowledge and would be prioritized in later executions.
     *
     * @var string
     */
    protected $uid;

    /**
     * The arg attribute is the value that is passed to the next portion of the workflow when the result item is
     * selected in the Alfred results list. So if you pressed enter on the sample item above, the value 'r96664'
     * would be passed to a shell script, applescript, or any of the other Action items.
     *
     * @var string
     */
    protected $arg;

    /**
     * The type attribute allows you to specify what type of result you are generating. Currently, the only value
     * available for this attribute is file. This will allow you to specify that the feedback item is a file and allows
     * you to use Result Actions on the feedback item.
     *
     * @var string null|file
     */
    protected $type;

    /**
     * The valid attribute allows you to specify whether or not the result item is a "valid", actionable item. Valid
     * values for this attribute are 'yes' or 'no'. By setting a result's valid attribute to 'no', the item won't be
     * actioned when this item is selected and you press Return. This allows you to provide result items that are only
     * for information or for help in auto completing information (See autocomplete flag below).
     *
     * @var boolean
     */
    protected $valid;

    /**
     * The autocomplete attribute is only used when the valid attribute has been set to 'no'. When attempting to action
     * an item that has the valid attribute set to 'no' and an autocomplete value is specified, the autocomplete value
     * is inserted into the Alfred window. When using this attribute, the arg attribute is ignored.
     *
     * @var boolean
     */
    protected $autocomplete;

    /**
     * The title element is the value that is shown in large text as the title for the result item. This is the main
     * text/title shown in the results list.
     *
     * @var string
     */
    protected $title;

    /**
     * The subtitle element is the value shown under the title in the results list. When performing normal searches
     * within Alfred, this is the area where you would normally see the file path.
     *
     * @var string
     */
    protected $subtitle;

    /**
     * ( optional - If not icon value is available, the icon will be blank. If the icon element is not present, a folder
     * icon will be used )
     * The icon element allows you to specify the icon to use for your result item. This can be a file located in your
     * workflow directory, an icon of a file type on your local machine, or the icon of a specific file on your system.
     * To use the icons of a specific file type or another folder/file, you must provide a type attribute to the icon
     * item.
     *
     * Example: <icon type="fileicon">/Applications</icon> - Use the icon associated to /Applications
     * Example: <icon type="filetype">public.folder</icon> - Use the public.folder (default folder) icon
     *
     * @var string
     */
    protected $icon;

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return Result
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @return string
     */
    public function getArg()
    {
        return $this->arg;
    }

    /**
     * @param string $arg
     * @return Result
     */
    public function setArg($arg)
    {
        $this->arg = $arg;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Result
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param boolean $valid
     * @return Result
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutocomplete()
    {
        return $this->autocomplete;
    }

    /**
     * @param boolean $autocomplete
     * @return Result
     */
    public function setAutocomplete($autocomplete)
    {
        $this->autocomplete = $autocomplete;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Result
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return Result
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Result
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }
}